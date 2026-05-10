function hcMolarÇözünürlükHesapla() {
    const kspStr = document.getElementById('hc-ms-ksp').value;
    if (!kspStr) return;
    
    const ksp = parseFloat(kspStr);
    const type = document.getElementById('hc-ms-type').value;
    let s = 0;

    switch(type) {
        case "1": s = Math.sqrt(ksp); break;
        case "2": s = Math.pow(ksp / 4, 1/3); break;
        case "3": s = Math.pow(ksp / 27, 1/4); break;
    }

    document.getElementById('hc-ms-val').innerText = s.toExponential(4) + ' mol/L';
    document.getElementById('hc-ms-result').classList.add('visible');
}
