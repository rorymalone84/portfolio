import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

function contactForm() {
    return {
        formData: {
            name: "",
            email: "",
            body: "",
        },
        formShow: false,
        formMessage: "",
        formLoading: false,
        buttonText: "Submit",
        submitForm() {
            this.formMessage = "";
            fetch('/contact/submit', {
                    method: "POST",
                    headers: {
                        'X-CSRF-TOKEN': document.head.querySelector('meta[name=csrf-token]').content,
                        "Content-Type": "application/json",
                        Accept: "application/json",
                    },
                    body: JSON.stringify(this.formData),
                })
                .then(() => {
                    this.formData.name = "";
                    this.formData.email = "";
                    this.formData.body = "";
                    this.formShow = true;
                    this.formMessage = "Message sent.";
                    console.log("Form successfully submitted.");
                })
                .catch(() => {
                    this.formMessage = "Something went wrong.";
                    console.log("Something went wrong.");
                });
        },
    };
}
