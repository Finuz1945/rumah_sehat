// Mobile menu toggle functionality
document.addEventListener("DOMContentLoaded", function () {
  const menuToggle = document.querySelector(".menu-toggle");
  const navList = document.getElementById("navList");

  if (menuToggle && navList) {
    menuToggle.addEventListener("click", function () {
      navList.classList.toggle("active");
    });
  }

  // Close menu when clicking outside
  document.addEventListener("click", function (event) {
    if (!event.target.closest(".navbar-container")) {
      if (navList && navList.classList.contains("active")) {
        navList.classList.remove("active");
      }
    }
  });

  // Status message handling with improved UX
  function getParameterByName(name) {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get(name);
  }

  function showPopup(message) {
    // Create a custom notification instead of using alert
    const notification = document.createElement("div");
    notification.className = "notification";
    notification.innerHTML = `
            <div class="notification-content">
                <p>${message}</p>
                <button class="close-notification"><i class="fas fa-times"></i></button>
            </div>
        `;

    // Style the notification
    const style = document.createElement("style");
    style.textContent = `
            .notification {
                position: fixed;
                top: 20px;
                right: 20px;
                background-color: #289dd2;
                color: white;
                padding: 15px;
                border-radius: 5px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.2);
                z-index: 1000;
                animation: slideIn 0.3s ease-out;
            }
            
            .notification-content {
                display: flex;
                align-items: center;
                justify-content: space-between;
            }
            
            .notification p {
                margin: 0;
                padding-right: 10px;
            }
            
            .close-notification {
                background: none;
                border: none;
                color: white;
                cursor: pointer;
                font-size: 16px;
            }
            
            @keyframes slideIn {
                from { transform: translateX(100%); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
            
            @keyframes slideOut {
                from { transform: translateX(0); opacity: 1; }
                to { transform: translateX(100%); opacity: 0; }
            }
        `;

    document.head.appendChild(style);
    document.body.appendChild(notification);

    // Add close button functionality
    const closeBtn = notification.querySelector(".close-notification");
    closeBtn.addEventListener("click", () => {
      notification.style.animation = "slideOut 0.3s ease-out";
      setTimeout(() => {
        notification.remove();
      }, 300);
    });

    // Auto remove after 5 seconds
    setTimeout(() => {
      if (document.body.contains(notification)) {
        notification.style.animation = "slideOut 0.3s ease-out";
        setTimeout(() => {
          notification.remove();
        }, 300);
      }
    }, 5000);
  }

  // Check for status parameters
  const status = getParameterByName("status");
  const role = getParameterByName("role");

  if (status === "success" && role === "pasien") {
    showPopup("Login berhasil sebagai Pasien.");
  } else if (status === "success" && role === "dokter") {
    showPopup("Login berhasil sebagai Dokter.");
  } else if (status === "failed") {
    showPopup("Login Gagal, silakan coba lagi.");
  }

  // Form validation
  const forms = document.querySelectorAll("form.warp");
  forms.forEach((form) => {
    form.addEventListener("submit", function (event) {
      const requiredInputs = form.querySelectorAll("input[required]");
      let isValid = true;

      requiredInputs.forEach((input) => {
        if (!input.value.trim()) {
          isValid = false;
          input.style.borderColor = "red";

          // Add error message if it doesn't exist
          let errorMessage = input.nextElementSibling;
          if (!errorMessage || !errorMessage.classList.contains("error-message")) {
            errorMessage = document.createElement("small");
            errorMessage.className = "error-message";
            errorMessage.style.color = "red";
            errorMessage.textContent = "Field ini wajib diisi";
            input.insertAdjacentElement("afterend", errorMessage);
          }
        } else {
          input.style.borderColor = "";

          // Remove error message if it exists
          const errorMessage = input.nextElementSibling;
          if (errorMessage && errorMessage.classList.contains("error-message")) {
            errorMessage.remove();
          }
        }
      });

      if (!isValid) {
        event.preventDefault();
        showPopup("Harap isi semua field yang wajib diisi");
      }
    });
  });

  // Lazy loading images for better performance
  if ("loading" in HTMLImageElement.prototype) {
    // Browser supports native lazy loading
    const images = document.querySelectorAll("img");
    images.forEach((img) => {
      img.loading = "lazy";
    });
  } else {
    // Fallback for browsers that don't support lazy loading
    // You could load a lazy loading library here if needed
  }
});
