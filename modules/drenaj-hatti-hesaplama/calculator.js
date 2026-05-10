function hcDrainageCalcHesapla() {
    const L = parseFloat(document.getElementById('hc-dh-len').value);
    const S = parseFloat(document.getElementById('hc-dh-slope').value);
    const W = parseFloat(document.getElementById('hc-dh-width').value);

    if (!L || !S) {
        alert('Lütfen uzunluk ve eğim giriniz.');
        return;
    }

    const drop = (L * S); // cm (because L is m and S is percentage)
    const avgDepth = (drop / 2) + 50; // Assume 50cm start depth
    const vol = L * (W / 100) * (avgDepth / 100);

    document.getElementById('hc-dh-res-drop').innerText = drop.toFixed(1);
    document.getElementById('hc-dh-res-vol').innerText = vol.toFixed(2);

    document.getElementById('hc-drainage-result').classList.add('visible');
}
