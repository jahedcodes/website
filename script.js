const uploadBtn = document.getElementById("uploadBtn");
const imageFile = document.getElementById("imageFile");
const uploadMessage = document.getElementById("uploadMessage");
const downloadBtn = document.getElementById("downloadBtn");


uploadBtn.addEventListener("click", () => imageFile.click());


imageFile.addEventListener("change", () => {
    const file = imageFile.files[0];
    if (!file) return;

    const formData = new FormData();
    formData.append("file", file);

    fetch("upload.php", { method: "POST", body: formData })
    .then(res => res.json())
    .then(result => {
        if(result.status === "success"){
            
            uploadMessage.style.display = "block";
            setTimeout(()=> uploadMessage.style.opacity = 1, 10);
            setTimeout(()=> {
                uploadMessage.style.opacity = 0;
                setTimeout(()=> uploadMessage.style.display = "none", 500);
            }, 3000);
        } else {
            alert("خطا در آپلود فایل!");
        }
        imageFile.value = "";
    })
    .catch(err => {
        console.error(err);
        alert("خطا در آپلود فایل!");
    });
});


downloadBtn.addEventListener("click", () => {
    window.open("gallery.php", "_blank");
});