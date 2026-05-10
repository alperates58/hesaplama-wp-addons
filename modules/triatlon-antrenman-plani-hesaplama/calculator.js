function hcTriPlanHesapla() {
    const type = document.getElementById('hc-tp-type').value;

    const plans = {
        sprint: [
            { name: "Yüzme", val: "1.5 - 2.5 km" },
            { name: "Bisiklet", val: "40 - 60 km" },
            { name: "Koşu", val: "15 - 20 km" }
        ],
        olympic: [
            { name: "Yüzme", val: "3 - 5 km" },
            { name: "Bisiklet", val: "80 - 120 km" },
            { name: "Koşu", val: "25 - 35 km" }
        ],
        half: [
            { name: "Yüzme", val: "5 - 8 km" },
            { name: "Bisiklet", val: "150 - 250 km" },
            { name: "Koşu", val: "40 - 60 km" }
        ],
        full: [
            { name: "Yüzme", val: "10 - 15 km" },
            { name: "Bisiklet", val: "300 - 500 km" },
            { name: "Koşu", val: "60 - 90 km" }
        ]
    };

    const currentPlan = plans[type];
    let html = "";
    currentPlan.forEach(p => {
        html += `<tr><td><strong>${p.name}</strong></td><td>${p.val}</td></tr>`;
    });

    document.getElementById('hc-tp-tbody').innerHTML = html;
    document.getElementById('hc-tri-plan-result').classList.add('visible');
}
