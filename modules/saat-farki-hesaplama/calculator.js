function hcSaatFarkiHesapla() {
    const start = document.getElementById('hc-sf-start').value;
    const end = document.getElementById('hc-sf-end').value;

    if (!start || !end) {
        alert('Lütfen başlangıç ve bitiş saatlerini seçin.');
        return;
    }

    const [h1, m1] = start.split(':').map(Number);
    const [h2, m2] = end.split(':').map(Number);

    let diffMinutes = (h2 * 60 + m2) - (h1 * 60 + m1);

    if (diffMinutes < 0) {
        diffMinutes += 24 * 60; // Next day
    }

    const diffH = Math.floor(diffMinutes / 60);
    const diffM = diffMinutes % 60;

    let result = "";
    if (diffH > 0) result += diffH + " saat ";
    if (diffM > 0) result += diffM + " dakika";
    if (diffH === 0 && diffM === 0) result = "0 dakika";

    document.getElementById('hc-sf-val').innerText = result;
    document.getElementById('hc-sf-result').classList.add('visible');
}
