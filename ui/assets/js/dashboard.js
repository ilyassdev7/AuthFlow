// =======================
// Dark / Light Mode
// =======================

const themeToggle = document.getElementById("themeToggle");

if (themeToggle) {

    if (localStorage.getItem("theme") === "light") {

        document.body.classList.add("light");
        themeToggle.innerHTML = '<i class="fa-solid fa-sun"></i>';

    }

    themeToggle.addEventListener("click", () => {

        document.body.classList.toggle("light");

        if (document.body.classList.contains("light")) {

            localStorage.setItem("theme", "light");
            themeToggle.innerHTML = '<i class="fa-solid fa-sun"></i>';

        } else {

            localStorage.setItem("theme", "dark");
            themeToggle.innerHTML = '<i class="fa-solid fa-moon"></i>';
        }

    });

}

// =======================
// Mobile Sidebar
// =======================

const menuToggle = document.getElementById("menuToggle");
const sidebar = document.querySelector(".sidebar");

if (menuToggle && sidebar) {

    menuToggle.addEventListener("click", () => {

        sidebar.classList.toggle("show");

    });

}
// =======================
// Search Users
// =======================

const searchUser = document.getElementById("searchUser");
const usersTable = document.getElementById("usersTable");

if (searchUser && usersTable) {

    searchUser.addEventListener("keyup", () => {

        const value = searchUser.value.toLowerCase();

        const rows = usersTable.querySelectorAll("tbody tr");

        rows.forEach(row => {

            const text = row.textContent.toLowerCase();

            if (text.includes(value)) {

                row.style.display = "";

            } else {

                row.style.display = "none";

            }

        });

    });

}
// =======================
// Toast
// =======================

const toast = document.getElementById("toast");

const params = new URLSearchParams(window.location.search);

if (toast && params.has("success")) {

    toast.textContent = params.get("success");

    toast.classList.add("show");

    setTimeout(() => {

        toast.classList.remove("show");

    },3000);

}

if (toast && params.has("error")) {

    toast.textContent = params.get("error");

    toast.classList.add("show","error");

    setTimeout(() => {

        toast.classList.remove("show","error");

    },3000);

}
// Logout confirmation

const logoutBtn = document.getElementById("logoutBtn");

if (logoutBtn) {

    logoutBtn.addEventListener("click", function(e){

        if(!confirm("Are you sure you want to logout?")){

            e.preventDefault();

        }

    });

}
// =======================
// Users Chart
// =======================

const chartCanvas = document.getElementById("usersChart");

if (chartCanvas) {

    new Chart(chartCanvas, {

        type: "line",

        data: {

            labels: ["Jan","Feb","Mar","Apr","May","Jun","Jul"],

            datasets: [{

                label: "Users",

                data: [12,19,8,15,27,32,45],

                borderColor: "#4F7CFF",

                backgroundColor: "rgba(79,124,255,.15)",

                fill: true,

                tension: .4

            }]

        },

        options: {

            responsive:true,

            plugins:{

                legend:{

                    display:false

                }

            }

        }

    });

}