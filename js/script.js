//
//function acesso() {
//    var user=document.getElementById("#login").value;
//    var pass=document.getElementById("#senha").value;
//    if(user == "italoxmns@gmail.com" && pass=="123456"){
//         document.getElementsByTagName("input")[2].setAttribute("href", "admin.php");
//       }else{
//           alert("Login e senha incorretos!");
//       }
//}
//function sair(){
//         document.getElementsByTagName("a")[3].setAttribute("href", "index.php");
//}
//
$("#telefone")
    .mask("(99) 99999-9999?9")
    .focusout(function (event) {  
        var target, phone, element;  
        target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
        phone = target.value.replace(/\D/g, '');
        element = $(target);  
        element.unmask();  
        if(phone.length > 10) {  
            element.mask("(99) 99999-999?9");  
        } else {  
            element.mask("(99) 9999-9999?9");  
        }  
    });
