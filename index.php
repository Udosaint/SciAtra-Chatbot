<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SciAstra Chatbot</title>

    <!-- Bootstrap CSS and Font Awesome -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }


        textarea::-webkit-scrollbar {
            width: 16px; /* Set a width for the scrollbar (adjust as needed) */
        }

        textarea::-webkit-scrollbar-thumb {
            background: transparent; 
        }

        textarea::-webkit-scrollbar-track {
            background: transparent; 
        }

        textarea {
            height: 50px;
            width: 100%;
            border: none;
            outline: none;
            resize: none;
            max-height: 180px;
            padding: 15px 15px 15px 0;
            font-size: 0.95rem;
        }

        #chatbot-container {
            display: none;
            transition: all 0.3s ease-in-out; /* Transition effect */
        }


        #chatbot-body {
            overflow-y: auto;
            height: 400px;
            padding: 20px 20px 10px;
        }

        #chatbot-body::-webkit-scrollbar {
            width: 10px;
        }

        #chatbot-body::-webkit-scrollbar-track {
          box-shadow: inset 0 0 5px grey; 
          border-radius: 10px;
      }

      #chatbot-body::-webkit-scrollbar-thumb {
          background: #724ae8; 
          border-radius: 10px;
      }



      .incoming{
          white-space: pre-wrap;
          padding: 12px 16px;
          border-radius: 10px 10px 10px 0;
          max-width: 75%;
          color: #000;
          background: #f2f2f2;
          font-size: 0.95rem;
      }

      .incoming2{
        white-space: wrap;
        padding: 12px 16px;
        border-radius: 10px 10px 10px 0;
        max-width: 75%;
        color: #000;
        background: #f2f2f2;
        font-size: 0.95rem;
    }

    .outgoing{
      white-space: pre-wrap;
      display: flex;
      margin: 20px 0;
      justify-content: flex-end;
      padding: 12px 16px;
      border-radius: 10px 10px 0 10px;
      max-width: 50%;
      color: #fff;
      font-size: 0.95rem;
      background: #724ae8;
      margin-left: auto;
  }


  #toggle-button {
    position: fixed;
    bottom: 20px;
    right: 20px;
    background-color: #4CAF50;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 10px;
    cursor: pointer;
}
</style>
</head>
<body>

    <!-- Chat Toggle Button -->
    <div class="fixed-bottom d-flex justify-content-end  p-4">
        <button style="padding: 18px;" class="btn btn-outline-primary text-center rounded-circle" onclick="toggleChatbot()">
            <i class="fas fa-comment fs-4"></i>
        </button> 
    </div> 
    

    <!-- Chatbot Container -->
    <div style="bottom: 20px; right: -20px;" class="fixed-bottom d-flex d-none p-5 mb-5 justify-content-end" id="chatbot-container">
        <div class="card bg-white rounded-4 col-md-3 col-sm-10">
            <div class="card-header bg-info text-white rounded-top-4 d-flex align-items-center justify-content-between ">
                <h3>SciAstra</h3>
                <i onclick="toggleChatbot()" style="cursor: pointer;" class="fas fa-sign-in-alt fs-3 text-white"></i>

            </div>
            <div id="chatbot-body" class="card-body">

                <div class="d-flex align-items-center justify-content-start gap-2">
                    <i class="fas fa-robot fs-5 text-primary"></i>
                    <p class="incoming">Hi there 👋<br>How can I help you today?</p>
                </div>

            </div>
            <div class="card-footer">
                <div class="d-flex align-items-center justify-content-between gap-2">
                    <textarea id="message" name="message" class="form-control" placeholder="Enter a message..." ></textarea>
                    <div style="cursor: pointer;" class="d-none"  id="send-button">
                        <i style="transform: rotate(45deg)" class="fas fa-paper-plane fs-4 text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap and Font Awesome JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>

    <script>

        $(document).ready(function(){
            //$("#send-button").hide();
        });

        var message = $("#message").val();

        const chatbotBody = $('#chatbot-body');

        const inputInitHeight = $("#message").scrollHeight;


        $("#message").on("input",function(){
            $("#send-button").removeClass('d-none');

            //$("#message").style.height = `${inputInitHeight}px`;
            //$("#message").style.height = `${$("#message").scrollHeight}px`;


        })


        function toggleChatbot() {
            var chatbotContainer = $('#chatbot-container');
            if (chatbotContainer.hasClass("d-none")) {
                chatbotContainer.removeClass("d-none");
            }else{
                chatbotContainer.addClass("d-none");
            }

        }

        $("#send-button").click(function (){
            sendMessage();
        });

        $("#message").on("keydown", (e) => {
            // If Enter key is pressed without Shift key and the window 
            // width is greater than 800px, handle the chat
            if(e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
                e.preventDefault();
                sendMessage();
            }
        });

        function sendMessage() {
            var userMessage = $("#message").val();

        // Display user message in the chat box
            chatbotBody.append('<p class="outgoing">' + userMessage + '</p>');

        // Clear the user input field
            $("#message").val('');

        // make the scroll bar for the chat area to always be at the buttom
            $('#chatbot-body').scrollTop($('#chatbot-body').scrollTop()+300);

            setTimeout(() => {

                $('#chatbot-body').scrollTop($('#chatbot-body').scrollTop()+300);
                generateResponse(userMessage);

            }, 600);
        }


        // get the reply and display it to the user
        function generateResponse(Message){
            $.ajax({
                url: 'message.php',
                type: 'POST',
                data: {req:'getmessage',message:Message},
                beforeSend:function(){
                    chatbotBody.append('<p class="think"><i class="fa-solid fa-ellipsis fs-4"></i></p>');
                },
                success: function (data) {

                    var rdata = JSON.parse(data);
                    setTimeout(() => {
                        if (rdata.success) {
                            $("p").remove(".think");
                            chatbotBody.append(rdata.success);
                        }else{
                            $("p").remove(".think");
                            chatbotBody.append(rdata.notfound);

                            setTimeout(() => {
                                autoResponse();
                            },1000);
                        }
                        $('#chatbot-body').scrollTop($('#chatbot-body').scrollTop()+300);
                    },600);  
                },
            });
        }


        // when user click on auto generated message do this
        function getres(id){
            $.ajax({
                url: 'message.php',
                type: 'POST',
                data: {req:'getAutomessage',message:id},
                beforeSend:function(){
                    chatbotBody.append('<p class="think"><i class="fa-solid fa-ellipsis fs-4"></i></p>');
                },
                success: function (data) {
                    setTimeout(() => {
                        $("p").remove(".think");
                        chatbotBody.append(data);

                        $('#chatbot-body').scrollTop($('#chatbot-body').scrollTop()+300);
                    },1000);  
                },
            });
        }


        // when there is no result found, generate the list of query the user can do
        function autoResponse(){
            $.ajax({
                url: 'querylist.php',
                type: 'POST',
                //data: {message:Message},
                beforeSend:function(){
                    chatbotBody.append('<p class="think"><i class="fa-solid fa-ellipsis fs-4"></i></p>');
                },
                success: function (data) {
                    setTimeout(() => {
                        $("p").remove(".think");
                        chatbotBody.append(data);
                        $('#chatbot-body').scrollTop($('#chatbot-body').scrollTop()+300);
                    },600);
                }
            });
        }

    </script>

</body>
</html>
