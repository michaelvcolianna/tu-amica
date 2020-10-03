<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class QuoteController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $validatedData = $request->validate([
            'firstname' => 'required',
            'lastname'  => 'required',
            'phone'     => 'required',
            'early'     => 'required',
            'late'      => 'required',
            'timezone'  => 'required',
            'email'     => 'required|email',
            'coverage'  => 'required',
        ]);

        $ajax = $request->has( 'ajax' );

        $submission = new \App\QuoteSubmission();
        $submission->firstname = $request->firstname;
        $submission->lastname = $request->lastname;
        $submission->phone = $request->phone;
        $submission->early = $request->early;
        $submission->late = $request->late;
        $submission->timezone = $request->timezone;
        $submission->email = $request->email;
        $submission->coverage = $request->coverage;

        $quotepage = request()->getLocale() . '.quote';

        $to = explode( ',', env( 'MAIL_RECIPIENT', 'hosting@cronin-co.com' ) );

        try
        {
            \Mail::to( $to )->send( new \App\Mail\QuoteForm( $submission ) );
        }
        catch( Exception $e )
        {
            Log::error( $e->getMessage() );

            if( $ajax )
            {
                return response()->json( [], 500 );
            }
            else
            {
                return redirect()->route( $quotepage )->with( 'form', 'error' );
            }
        }

        // No PII store in QA or Production
        if( env( 'APP_ENV' ) == 'local' )
        {
            $submission->save();
        }

        if( $ajax )
        {
            return response()->json( [], 200 );
        }
        else
        {
            return redirect()->route( $quotepage )->with( 'form', 'submitted' );
        }
    }
}
