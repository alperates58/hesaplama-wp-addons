function hcTriAvgHesapla() {
    const type = document.getElementById('hc-ta-type').value;

    const avgs = {
        sprint: { male: "01:30:00", female: "01:45:00" },
        olympic: { male: "02:50:00", female: "03:10:00" },
        half: { male: "06:00:00", female: "06:45:00" },
        full: { male: "12:35:00", female: "13:30:00" }
    };

    const res = avgs[type];
    document.getElementById('hc-ta-male').innerText = res.male;
    document.getElementById('hc-ta-female').innerText = res.female;

    document.getElementById('hc-tri-avg-result').classList.add('visible');
}
