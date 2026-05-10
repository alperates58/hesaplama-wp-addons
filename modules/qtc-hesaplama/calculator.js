function hcQTcHesapla() {
    const qt = parseFloat(document.getElementById('hc-qt-val').value);
    const hr = parseFloat(document.getElementById('hc-qt-hr').value);

    if (!qt || !hr) return;

    // RR = 60 / HR (seconds)
    const rr = 60 / hr;
    
    // Bazett's Formula: QTc = QT / sqrt(RR)
    // Input QT is in ms, RR is in seconds
    const qtc = (qt / 1000) / Math.sqrt(rr);

    const qtcMs = qtc * 1000;

    document.getElementById('hc-qt-res').innerText = Math.round(qtcMs) + ' ms';
    document.getElementById('hc-qt-result').classList.add('visible');
}
