<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>SOAP API Documentation</title>
        <!-- Bootstrap CSS -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="container mt-4">
        <h1 class="mb-4">SOAP API Documentation</h1>
        <h2>Base URL</h2>
        <p>The base URL for the SOAP API endpoints is <code>http://127.0.0.1:8000</code>.</p>
        <h2>Authentication</h2>
        <p>This SOAP API does/doesn’t require authentication.</p>
        <h2>Endpoints</h2>
        <div class="card mb-3">
            <div class="card-header">
                <h3 class="mb-0">1. List Users</h3>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li><strong>Endpoint:</strong> <code>POST /api/v1/users</code></li>
                    <li><strong>Description:</strong> Retrieves a list of users in XML format.</li>
                    <li>
                        <strong>Request:</strong>
                        <ul>
                            <li><strong>Headers:</strong> Content-Type: text/xml</li>
                            <li><strong>Body:</strong> No request body required</li>
                        </ul>
                    </li>
                    <li>
                        <strong>Response:</strong>
                        <ul>
                            <li><strong>Content-Type:</strong> application/xml</li>
                            <li>
                                <strong>Body Example:</strong>
                                <pre>&lt;users&gt;
    &lt;user&gt;
        &lt;name&gt;John Doe&lt;/name&gt;
        &lt;email&gt;john@example.com&lt;/email&gt;
        &lt;gender&gt;male&lt;/gender&gt;
        &lt;dob&gt;1990-05-15&lt;/dob&gt;
    &lt;/user&gt;
    &lt;!-- Other user records --&gt;
&lt;/users&gt;</pre>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card mb-3">
            <div class="card-header">
                <h3 class="mb-0">2. Create User</h3>
            </div>
            <div class="card-body">
                <ul class="list-unstyled">
                    <li><strong>Endpoint:</strong> <code>POST /api/v1/createuser</code></li>
                    <li><strong>Description:</strong> Creates a new user based on the provided XML data.</li>
                    <li>
                        <strong>Request:</strong>
                        <ul>
                            <li><strong>Headers:</strong> Content-Type: text/xml</li>
                            <li>
                                <strong>Body Example:</strong>
                                <pre>&lt;user&gt;
    &lt;name&gt;Jane Doe&lt;/name&gt;
    &lt;email&gt;jane@example.com&lt;/email&gt;
    &lt;gender&gt;female&lt;/gender&gt;
    &lt;dob&gt;1995-08-25&lt;/dob&gt;
&lt;/user&gt;</pre>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <strong>Response:</strong>
                        <ul>
                            <li><strong>Content-Type:</strong> application/xml</li>
                            <li>
                                <strong>Body Example (Success):</strong>
                                <pre>&lt;response&gt;
    &lt;success&gt;true&lt;/success&gt;
    &lt;message&gt;User created successfully&lt;/message&gt;
&lt;/response&gt;</pre>
                            </li>
                            <li>
                                <strong>Body Example (Failure):</strong>
                                <pre>&lt;response&gt;
    &lt;success&gt;false&lt;/success&gt;
    &lt;message&gt;Failed to create user&lt;/message&gt;
&lt;/response&gt;</pre>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <h2>Error Handling</h2>
        <p>HTTP status codes and relevant error messages are returned in case of errors or invalid requests.</p>
        <!-- Bootstrap JS (Optional) -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </body>
</html>