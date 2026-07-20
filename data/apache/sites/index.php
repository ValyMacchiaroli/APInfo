<!DOCTYPE html>
<html>
    <body>
        <?php
        if (empty($_POST["description"])) {
            $description = "";
        } else {
            $description = test_input($_POST["description"]);
        }

        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>
        <form method="post">
            Description: <br><textarea name="description" rows="5" cols="40"><?php echo $description;?></textarea>
            <br><br>
            <input type="submit" name="submit" value="Submit">
        </form>
        <?php
            $data = [
                'model'        =>   'google/gemma-4-e4b',
                'messages'     =>   [
                    [
                        'role'      =>  'system',
                        'content'   =>  'Respond quickly, using no more than 20 words.'
                    ],
                    [
                        'role'      =>  'user',
                        'content'   =>  $description
                    ]
                ],
                'temperature'   =>  0.0,
                'max_tokens'    =>  40,
                'stream'        =>  false
            ];
            $ch = curl_init('http://10.10.14.124:1234/v1/chat/completions');
            curl_setopt_array($ch, [
                CURLOPT_RETURNTRANSFER  =>  true,
                CURLOPT_POST            =>  true,
                CURLOPT_POSTFIELDS      =>  json_encode($data),
                CURLOPT_HTTPHEADER      =>  [
                    'Content-Type: application/json',
                    'Authorization: Bearer sk-lm-ah3QumLA:VxAJb65jPcARUwayywly'
                ],
                CURLOPT_TIMEOUT         => 30
            ]);
            $response = curl_exec($ch);
            if (curl_errno($ch)) {
                die("Error: " . curl_Error($ch));
            };
            curl_close($ch);
            $res = json_decode($response, true);
            $text = $res['choices'][0]['message']['content'] ?? '';
            $text = preg_replace('/<think>.*?<\/think>/is', '', $text);
            echo "<h3>AI:</h3><p>" . nl2br(htmlspecialchars(trim($text))) . "</p>";
        ?>
    </body>
</html>