<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Password</title>
</head>

<body style="margin: 0; padding: 10px; background-color: #f3f3f3">
    <a href="{{ $resetUrl }}"
        style="
													display: inline-block;
													font-family: Arial, sans-serif;
													font-size: 16px;
													color: black;
													text-decoration: none;
													background-color: #fecd07;
													padding: 12px 20px;
													border-radius: 5px;
													width: 100%;
													max-width: 200px;
													text-align: center;
												">
        Reset Password
    </a>

    <a href="{{ $resetUrl }}"
        style="
											color: blue;
											word-break: break-all;
											display: block;
											max-width: 100%;
											overflow-wrap: break-word;
										">
        {{ $resetUrl }}
    </a>
</body>

</html>
