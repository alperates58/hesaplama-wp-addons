function hcThreadPitchHesapla() {
    const L = parseFloat(document.getElementById('hc-tp-len').value);
    const N = parseFloat(document.getElementById('hc-tp-count').value);

    if (!L || !N) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    // Pitch = Total Length / Number of Threads
    const pitch = L / N;

    const resVal = document.getElementById('hc-tp-res-val');
    resVal.innerText = pitch.toFixed(3).toLocaleString('tr-TR');

    document.getElementById('hc-pitch-result').classList.add('visible');
}
