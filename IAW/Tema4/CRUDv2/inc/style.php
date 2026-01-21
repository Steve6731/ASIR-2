<style>
   :root {
      --bs-dark-rgb: 34, 34, 34;
   }
   body{background: #333538}
   h1 {
      background: #2b2b2b
   }

   .Pcard{
      display: flex;
      align-items: center;
      justify-content: center;
      max-width: 75%;
      flex-wrap: wrap;
   }

   .card,form{
      width: 75%;
      max-width: 75%;
   }

   form{
      width: 100%;
      max-width: 100%;
   }

   .btn,button{
      background: #4b93ff;
      color: #ffffff
   }
   .btn:hover,button:hover{
      background: #8cb7f8;
      color: #ffffff
   }
   .delete{
      background: #ff5024;
   }
   .delete:hover{
      background: #ff7957;
   }

   .btn:active,button:active{
      transform: translateY(-2px);
      box-shadow: 0 2px 4px rgba(0,0,0,0.2);
   }

   .back{
      min-width: 15em;
      margin: 0 80%;
   }

   .menuLogging {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 80vh;
      margin: 0;
   }
   .menuLogging .card{
      display: flex;
      justify-content: center;
      align-items: center;
      max-width: 30%;
      padding: 50px 100px;
   }

   .menuLogging .card form{
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 30px 0px;
      flex-wrap: wrap;
   }

   .menuLogging form div{
      width: 100%;
      font-size: 1.2em;
   }

   .menuLogging form h2{
      width: 100%;
      text-align: center;
      color: #4b93ff;
      font-size: 2em;
      font-weight: 900;
   }

   .btnArea{
      display: flex;
      justify-content: center;
   }

   .btnArea .btn{
      width: 10em;
      display: flex;
      justify-content: center;
   }

   .erroArea p{
      margin: 5px 0px 0px;
      text-align: center;
   }

   p{
      margin: 0;
      text-align: center;
   }

   .registerResults{
      font-size: 3em;
      background: none;
      font-weight: 900;
   }

   .registerResults span{
      color: #4b93ff;
   }
</style>