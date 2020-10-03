@extends( 'layouts.base' )

@section( 'content' )
    @copyblock

    <section class="cta quote-cta" id="quote-cta-top">
        <div class="cta-inner">
            @callbutton

            @dropdown( ['id' => 'pullDropdown'] )

            {!! $page->cta_text !!}
        </div>
    </section>

    <section class="form-message" id="quote-completed">
        {!! $page->form_thanks !!}
    </section>

    <section class="form-message" id="quote-error">
        {!! str_replace( '%phd%', '<a href="tel:' . $phd . '">' . $phd . '</a>', $page->form_error) !!}
    </section>

    <section id="quote-form">
        <h2>
            {{ $page->contact_headline }}
        </h2>

        {!! $page->contact_text !!}

        <form action="{{ route( 'submit' ) }}" method="POST">
            @csrf

            @if( $errors->any() )
                <div class="form-error">
                    Fields marked * are required.
                </div>
            @endif

            <div class="form-field firstname @error( 'firstname' ) invalid @enderror">
                <label for="firstname">
                    {{ $page->form_firstname }}
                </label>

                <input id="firstname" name="firstname" type="text" value="" required autocapitalize="off" autocomplete="given-name">

                @error( 'firstname' )
                    <span role="alert">
                        <strong>*</strong>
                    </span>
                @enderror
            </div>

            <div class="form-field lastname @error( 'lastname' ) invalid @enderror">
                <label for="lastname">
                    {{ $page->form_lastname }}
                </label>

                <input id="lastname" name="lastname" type="text" value="" required autocapitalize="off" autocomplete="family-name">

                @error( 'lastname' )
                    <span role="alert">
                        <strong>*</strong>
                    </span>
                @enderror
            </div>

            <div class="form-field phone @error( 'phone' ) invalid @enderror">
                <label for="phone">
                    {{ $page->form_phone }}
                </label>

                <input id="phone" name="phone" type="tel" value="" required autocapitalize="off" autocomplete="tel">

                @error( 'phone' )
                    <span role="alert">
                        <strong>*</strong>
                    </span>
                @enderror
            </div>

            <div class="form-row">
                <div class="form-field early @error( 'early' ) invalid @enderror">
                    <label for="early">
                        {{ $page->form_early }}
                    </label>

                    <div class="select">
                        <select id="early" name="early" required>
                            @timeoptions
                        </select>
                    </div>

                    @error( 'early' )
                        <span role="alert">
                            <strong>*</strong>
                        </span>
                    @enderror

                    @error( 'late' )
                        <span role="alert">
                            <strong>*</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-field late @error( 'late' ) invalid @enderror">
                    <label for="late">
                        {{ $page->form_and }}
                    </label>

                    <div class="select">
                        <select id="late" name="late" required>
                            @timeoptions
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-field timezone @error( 'timezone' ) invalid @enderror">
                <label for="timezone">
                    {{ $page->form_timezone }}
                </label>

                <div class="select">
                    <select id="timezone" name="timezone" required>
                        <option value>--</option>
                        <option>{{ $page->timezone_eastern }}</option>
                        <option>{{ $page->timezone_central }}</option>
                        <option>{{ $page->timezone_mountain }}</option>
                        <option>{{ $page->timezone_pacific }}</option>
                    </select>
                </div>

                @error( 'timezone' )
                    <span role="alert">
                        <strong>*</strong>
                    </span>
                @enderror
            </div>

            <div class="form-field @error( 'email' ) invalid @enderror">
                <label for="email">
                    {{ $page->form_email }}
                </label>

                <input id="email" name="email" type="email" value="" required autocapitalize="off" autocomplete="email">

                @error( 'email' )
                    <span role="alert">
                        <strong>*</strong>
                    </span>
                @enderror
            </div>

            <div class="form-field coverage @error( 'coverage' ) invalid @enderror">
                <label for="coverage">
                    {{ $page->form_coverage }}
                </label>

                <div class="select">
                    <select id="coverage" name="coverage" required>
                        <option value>--</option>
                        <option>{{ $page->coverage_auto }}</option>
                        <option>{{ $page->coverage_home }}</option>
                        <option>{{ $page->coverage_both }}</option>
                        {{-- <option>{{ $page->coverage_life }}</option> --}}
                    </select>
                </div>

                @error( 'coverage' )
                    <span role="alert">
                        <strong>*</strong>
                    </span>
                @enderror
            </div>

            <button type="submit">
                {{ $page->form_submit }}
            </button>
        </form>
    </section>

    <section class="cta quote-cta" id="quote-cta-bottom">
        <div class="cta-inner">
            {!! $page->bottom_text !!}

            @callbutton

            @dropdown( ['id' => 'bottomDropdown'] )

            {{--<aside>
                {{ $page->bottom_extra }}
            </aside>--}}
        </div>
    </section>
@endsection
