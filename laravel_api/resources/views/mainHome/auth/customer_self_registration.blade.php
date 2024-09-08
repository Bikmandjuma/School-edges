<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Customer registration</title>
	<style type="text/css">
		/*{
		    padding: 0;
		    margin: 0;
		    box-sizing: border-box;
		}*/
		html, body{
		    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		    background-color:#eee; 
		    height:100%;
		}
		.container{ 
		   height:100%;
		   display:flex;
		   align-items:center;
		   justify-content:center;
		}
		.content{
		    background-color:white;
		    width:500px;
		    height:500px;
		    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
		}
		img{
		    width: 100%;
		    height: 25%;
		}
		.form-title{
		    padding:10px 40px 0px;
		}
		form{
		    padding:0px 40px;
		}
		input[type=text], [type=email]{
		    border: none;
		    border-bottom: 1px solid black;
		    outline:none;
		    width:100%;
		    margin: 8px 0;
		    padding:10px 0;
		}
		input[type=number]{
		    border: none;
		    border-bottom: 1px solid black;
		    outline:none;
		    margin: 8px 0;
		    padding:5px 0;
		}
		input :hover {
		    background-color: red;
		}
		select{
		    border: none;
		    border-bottom: 1px solid black;
		    outline:none;
		    margin: 8px 0;
		    padding:5px 0;
		    width:50%;
		}
		.beside{
		    display:flex;  
		    justify-content: space-between;
		}

		.besidex{
		    display:flex;  
		    justify-content: space-between;
		}
		button{
		    color:#ffffff;
		    background-color: #4caf50;
		    height:40px;
		    width:25%;
		    margin-top:15px;
		    cursor: pointer;
		    border:none;
		    border-radius:2%;
		    outline:none;
		    text-align:center;
		    font-size:16px;
		    text-decoration:none;
		    -webkit-transition-duration:0.4s;
		    transition-duration:0.4s;
		}
		button:hover{
		    background-color:#333333;
		}
	</style>
</head>
<body>

	<div class="container">
	    <div class="content">
	       <img src="https://res.cloudinary.com/debbsefe/image/upload/f_auto,c_fill,dpr_auto,e_grayscale/image_fz7n7w.webp" alt="header-image" class="cld-responsive">
	            <h1 class="form-title">Register Here</h1>
	            <form>
	                <input type="text" placeholder="NAME">
		            
		            <div class="beside">
		                <input type="number" placeholder="PHONE NUMBER">
		                <select>
		                    <option>GENDER</option>
		                    <option>MALE</option>
		                    <option>FEMALE</option>
		                    <option>NON-BINARY</option>
		                </select>
		            </div>
      
	                <button type="button">Submit</button>
	                
	            </form>
	        </div>
	 </div>

</body>
</html>