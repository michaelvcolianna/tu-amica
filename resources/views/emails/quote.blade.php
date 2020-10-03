<!doctype html>
<html>
    <head>
        <meta name="viewport" content="width=device-width">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Form Submission</title>
        <style>
            body
            {
                background-color: #f6f6f6;
                font-family: sans-serif;
                -webkit-font-smoothing: antialiased;
                font-size: 16px;
                line-height: 1.4;
                margin: 16px;
                padding: 0;
                -ms-text-size-adjust: 100%;
                -webkit-text-size-adjust: 100%;
            }
            strong
            {
                display: block;
            }
        </style>
    </head>

    <body>
        <p style="color: #666; font-size: 125%;">
            The form on TuAmica.com was submitted with the following details.
        </p>

        <p>
            <strong>First name:</strong>
            {{ $submission->firstname }}
        </p>

        <p>
            <strong>Last name:</strong>
            {{ $submission->lastname }}
        </p>

        <p>
            <strong>Phone:</strong>
            {{ $submission->phone }}
        </p>

        <p>
            <strong>Call between:</strong>
            {{ $submission->early }}
            and
            {{ $submission->late }}
        </p>

        <p>
            <strong>Time zone:</strong>
            {{ $submission->timezone }}
        </p>

        <p>
            <strong>E-mail:</strong>
            {{ $submission->email }}
        </p>

        <p>
            <strong>Coverage interest:</strong>
            {{ $submission->coverage }}
        </p>
    </body>
</html>
