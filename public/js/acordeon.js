const faqsTitles = document.querySelectorAll(".faq .head");
faqsTitles.forEach((faq) => {
    faq.addEventListener("click", () => {
        faq.parentNode.classList.toggle("active");
        
        const faqContent = faq.nextElementSibling;
        if (faq.parentNode.classList.contains("active")) {
            faqContent.style.height = (faqContent.scrollHeight + 30) + "px";
        } else {
            faqContent.style.height = "0px";
        }
    });
});