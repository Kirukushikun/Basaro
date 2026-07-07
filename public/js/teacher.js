const hideBtn = document.getElementById("toggle-btn");
const revealBtn = document.getElementById("sidebar-reveal-btn");
const nav = document.querySelector(".app-sidebar");

function setSidebarCollapsed(collapsed) {
    nav.classList.toggle("collapsed", collapsed);
    document.body.classList.toggle("sidebar-collapsed", collapsed);
    localStorage.setItem("nav-collapsed", collapsed);
}

// Restore saved state on page load
setSidebarCollapsed(localStorage.getItem("nav-collapsed") === "true");

hideBtn.addEventListener("click", () => setSidebarCollapsed(true));
revealBtn.addEventListener("click", () => setSidebarCollapsed(false));

const tabs = document.querySelectorAll(".tab-btn");
const contents = document.querySelectorAll(".tab-content");

if (tabs) {
    tabs.forEach((tab) => {
        tab.addEventListener("click", () => {
            const target = tab.getAttribute("data-tab");

            // reset all tabs
            tabs.forEach((t) => {
                t.classList.remove("active", "bg-white", "text-gray-800", "border", "border-b-0", "border-gray-200");
                t.classList.add("bg-gray-100", "text-gray-600");
            });

            // show clicked tab
            tab.classList.add("active", "bg-white", "text-gray-800", "border", "border-b-0", "border-gray-200");
            tab.classList.remove("bg-gray-100", "text-gray-600");

            // hide/show content
            contents.forEach((c) => c.classList.add("hidden"));
            document.getElementById(target).classList.remove("hidden");
        });
    });
}