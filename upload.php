<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publis Answer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        .gpt-btn {
            color: white;
            background: green;
            padding: 12px;
            font-size: 14px;
            font-family: sans-serif;
            border: none;
            margin: 2px;
            text-align: center;
        }
    </style>

</head>

<body>

    <div class="container">
        <div class="card card-body col-md-6 m-auto mt-5 ">

            <p class="h3 text-secondary">

                Publish Answer 
            </p>

            <div id="quer" class="mb-2">
                <label>Query</label>
            </div>

            <div class="mb-2">
                <label for="">Select Language</label>
                <!-- <input type="text" name="" id="lang" placeholder="language"> -->

                <select class="form-control" id="lang">
                    <option value="assembly">Assembly</option>
                    <option value="c">C</option>
                    <option value="css">CSS</option>
                    <option value="html">Html</option>
                    <option value="javascript">Javascript</option>
                    <option value="php">PHP</option>
                    <option value="python">Python</option>
                    <option value="shell">Shell/Bash</option>
                    <option value="sql">SQL</option>
                    <option value="whatever">Whatever</option>
                </select>

            </div>

            <div class="mb-2">
                <div align="center"> <button class="gpt-btn">Generate Solution using ChatGPT</button> </div>
                <textarea class="form-control mt-4" id="answer" placeholder="Solution" rows="5" cols="30" style="height:inherit"></textarea>
            </div>

            <div class="d-grid gap-2 ">
                <button id="btn" class="btn btn-primary" onclick="uploadAnswer()"> Upload Answer </button>
            </div>



        </div>

    </div>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const pageSize = urlParams.get('qu');
        let textarea = document.createElement('textarea');

        textarea.value = decodeURIComponent(pageSize);
        textarea.rows = 15;
        textarea.cols = 50;
        textarea.setAttribute("id", "query");
        textarea.setAttribute("class", "form-control");

        // document.getElementById('query').innerHTML = pageSize;
        document.getElementById('quer').appendChild(textarea)


        //GREPPER TOKEN and USER ID	    
        const token = "YOUR_TOKEN"; // STRING
        const userId = "YOUR_ID"; //INT  not inside "" while writing integer


        async function uploadAnswer() {

            const data = {
                answer: document.getElementById('answer').value,
                user_id: userId,
                language: document.getElementById('lang').value,
                is_private: false,
                codeSearch: {
                    search: document.getElementById('query').value
                }
            };

            //upload answer 
            await fetch(`https://www.codegrepper.com/api/save_answer.php`, {

                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "x-auth-token": token,
                        "x-auth-id": userId
                    },

                    body: JSON.stringify(data)

                })

                .then((response) => {
                    if (response.status !== 200) {
                        return {
                            Success: false,
                            Message: `Server Returned an invalid response.`,
                        };
                    }
                    return response.json();
                })

                .then((response) => {
                    console.log(response);
                    if (response.success == true) {
                        let msg = "Answer uploaded Successfully!!"
                        msg.style.fontSize = "20px";
                        msg.style.color = "green";

                        document.getElementById("alarmmsg").innerHTML = msg;

                        setTimeout(function() {
                            document.getElementById("alarmmsg").innerHTML = '';
                        }, 3000);
                    }


                })
                .catch((err) => {
                    console.log(err);
                });


            query = decodeURIComponent(pageSize);
            sendToDatabase(query);

        }


        async function sendToDatabase(query) {
            await fetch('upload_db.php', {
                    method: "POST",
                    quer: JSON.stringify(query)
                })
                .then((res) => {
                    return res.json()
                })
                .catch(err => console.log(err))
        }
    </script>

</body>

</html>