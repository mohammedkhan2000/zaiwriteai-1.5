document
    .querySelector("#app-logo-profile-img-file-input")
    .addEventListener("change", function () {
        var o = document.querySelector(".app-logo-user-profile-image"),
            e = document.querySelector(".app-logo-profile-img-file-input").files[0],
            i = new FileReader();
        i.addEventListener(
            "load",
            function () {
                o.src = i.result;
            },
            !1
        ),
            e && i.readAsDataURL(e);
    });

document
    .querySelector("#app-logo-profile-img-file-input-black")
    .addEventListener("change", function () {
        var o = document.querySelector(".app-logo-user-profile-image-black"),
            e = document.querySelector(".app-logo-profile-img-file-input-black").files[0],
            i = new FileReader();
        i.addEventListener(
            "load",
            function () {
                o.src = i.result;
            },
            !1
        ),
            e && i.readAsDataURL(e);
    });
