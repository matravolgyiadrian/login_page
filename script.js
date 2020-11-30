$(function(){
  $(document).one('click', '.submit-btn', function(){
    submitForm();
  }) //click()

}) //ready()


function submitForm(){
  var request;

  $('form').submit(function(event){
    event.preventDefault();

    if(request){
      request.abort();
    }

    var $form = $(this);
    var $inputs = $form.find("input");
    var serializedData = $form.serialize();

    $inputs.prop("disabled", true);

    request = $.ajax({
      url: "/process.php",
      type: "post",
      data: serializedData
    }); //request

    request.done(
      function(response, testStatus, jqXHR){
        console.log(response);
        $("form").trigger("reset");
        if(response == -1){
          $('#error').html("Username doesn't exists!").css("opacity", "1");
        } else if(response == -2){
          $('#error').html("Incorrect password!").css("opacity", "1");
          setTimeout(function() {window.location.replace("http://www.police.hu/");}, 3000);
        }else {
          $('#error').css("opacity", "0");
          submitAnimation(response);
        }
      }
    ); //request.done()

    request.fail(
      function(jqXHR, textStatus, errorThrown){
        console.log("following error occured: "+textStatus, errorThrown);
      }
    ); //request.fail()

    request.always(function () {
        $inputs.prop("disabled", false);
        console.log("Submit END!");
    }); //request.always()
  }); //submit
}

function submitAnimation(color){
  const button = document.querySelector(".submit-btn");

  var properColor = revealTheSecret(color);

  button.classList.add('btn--clicked');
  setTimeout(()=>{document.querySelectorAll('.color').forEach((element)=>{element.classList.add('expanded')});},400);
  setTimeout(()=>{$("body").css("background-color", properColor);}, 1000);

  setTimeout(()=>{document.querySelectorAll('.color').forEach((element)=>{element.classList.remove('expanded')})}, 2100);
  setTimeout(()=>{button.classList.remove('btn--clicked')}, 3500);
  console.log("Animation END!");
}

function revealTheSecret(secret){
  let color = '';
  switch(secret){
    case "piros": color = "#e74c3c"; break;
    case "zold": color = "#2ecc71"; $('.color--green').css("display","none"); break;
    case "sarga": color = "#f1c40f"; break;
    case "kek": color = "#3498db"; break;
    case "fekete": color = "#1e272e"; break;
    case "feher": color = "#ffffff"; $('.color--white').css("display","none"); break;
  }

  $('.secret').css("background-color", color);

  return color;
}
