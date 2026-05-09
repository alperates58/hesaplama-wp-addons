function hcToeflHesapla() {
    const r = parseInt(document.getElementById('hc-toefl-r').value) || 0;
    const l = parseInt(document.getElementById('hc-toefl-l').value) || 0;
    const s = parseInt(document.getElementById('hc-toefl-s').value) || 0;
    const w = parseInt(document.getElementById('hc-toefl-w').value) || 0;

    const total = r + l + s + w;

    if (total > 120) {
        alert('Toplam skor 120\'yi geçemez.');
        return;
    }

    document.getElementById('hc-toefl-val').innerText = total + " / 120";
    document.getElementById('hc-toefl-result').classList.add('visible');
}
