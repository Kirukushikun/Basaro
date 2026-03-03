const toggleBtn = document.getElementById("toggle-btn");
const nav = document.querySelector("body > nav:not(.bottom-nav)");

// Guard: nav is hidden on mobile, skip if not present
if (nav) {
    const isCollapsed = localStorage.getItem("nav-collapsed") === "true";
    if (isCollapsed) nav.classList.add("collapsed");

    toggleBtn.addEventListener("click", () => {
        nav.classList.toggle("collapsed");
        localStorage.setItem("nav-collapsed", nav.classList.contains("collapsed"));
    });
}

// Tab logic unchanged
const tabs = document.querySelectorAll(".tab-btn");
const contents = document.querySelectorAll(".tab-content");

if (tabs.length) {
    tabs.forEach((tab) => {
        tab.addEventListener("click", () => {
            const target = tab.getAttribute("data-tab");

            tabs.forEach((t) => {
                t.classList.remove("active", "bg-white", "text-gray-800", "border", "border-b-0", "border-gray-200");
                t.classList.add("bg-gray-100", "text-gray-600");
            });

            tab.classList.add("active", "bg-white", "text-gray-800", "border", "border-b-0", "border-gray-200");
            tab.classList.remove("bg-gray-100", "text-gray-600");

            contents.forEach((c) => c.classList.add("hidden"));
            document.getElementById(target).classList.remove("hidden");
        });
    });
}