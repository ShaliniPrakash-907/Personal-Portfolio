const links = document.querySelectorAll("nav ul li a");

links.forEach(link => {
    link.addEventListener("click", function(event) {
        event.preventDefault();

        const sectionId = this.getAttribute("href");
        const section = document.querySelector(sectionId);

        section.scrollIntoView({
            behavior: "smooth"
        });
    });
});

const resumeButton = document.querySelector("button");

resumeButton.addEventListener("click", function() {
    console.log("Resume download clicked");
});