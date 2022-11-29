
$button=document.querySelector(".showformbtn");
$form=document.querySelector(".form");
$input=document.querySelectorAll("#input");
$button.addEventListener("click", function (){
    $form.classList.toggle("is_active");
});
for(let i = 0 ; i<$input.length;i++){
    $input[i].addEventListener("input", function (){
        $inputusername = $input[0].value;
        $inputcontent = $input[1].value;

    })
}