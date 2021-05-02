window.onclick=function(){
    $.ajax({
        type: 'GET',
        url: 'C:\Users\any\Desktop\abc.txt',
        success: function(data){
            document.querySelector("body").innerHTML=data;
        },
        error: function(){
            alert("File not found");
        }
      });
    }