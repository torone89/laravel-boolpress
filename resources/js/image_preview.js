

// const placeholder = "'"
// const image = document.getElementById('image')
// const preview = document.getElementById('preview')

// image.addEventListener('input', () => {

//     if (image.files && image.files[0]) {
//         let reader = new FileReader();
//         reader.readAsDataURL(image.files[0]);
//         reader.addEventListener('load', event => {
//             preview.src = event.target.result;
//         })

//     } else preview.src = placeholder;
  
// })


const placeholder = "https://ralfvanveen.com/wp-content/uploads/2021/06/Placeholder-_-Begrippenlijst.svg"
const image = document.getElementById('image')
const preview = document.getElementById('preview')

image.addEventListener('input', () => {
    if (image.files && image.files[0]) {
        let reader = new FileReader();
        reader.readAsDataURL(image.files[0]);
        reader.addEventListener('load', event => {
            preview.src = event.target.result;
        });
    } else preview.src = placeholder;
           preview.setAttribute('src', placeholder);
})