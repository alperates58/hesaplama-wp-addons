function hcEKGKalpHızıHesapla() {
    const squares = parseFloat(document.getElementById('hc-ekg-squares').value);

    if (!squares) return;

    // HR = 1500 / n (small squares)
    const hr = 1500 / squares;

    document.getElementById('hc-ekg-val').innerText = Math.round(hr) + ' atım/dk';
    document.getElementById('hc-ekg-result').classList.add('visible');
}
