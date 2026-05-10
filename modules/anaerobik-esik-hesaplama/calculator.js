function hcAnaerobicHesapla() {
    const age = parseInt(document.getElementById('hc-at-age').value);
    const fitness = parseFloat(document.getElementById('hc-at-fitness').value);

    if (!age) {
        alert('Lütfen yaşınızı giriniz.');
        return;
    }

    // Anaerobic threshold is typically 80-90% of Max HR
    const maxHr = 220 - age;
    const threshold = maxHr * fitness;

    const resVal = document.getElementById('hc-at-res-val');
    resVal.innerText = Math.round(threshold);

    document.getElementById('hc-hr-anaerobic-result').classList.add('visible');
}
