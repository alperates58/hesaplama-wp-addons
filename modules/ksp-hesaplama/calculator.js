function hcKspHesapla() {
    let sStr = document.getElementById('hc-ksp-s').value;
    if (!sStr) return;
    
    let s = parseFloat(sStr);
    const type = document.getElementById('hc-ksp-type').value;
    let ksp = 0;

    switch(type) {
        case "1": ksp = Math.pow(s, 2); break;
        case "2": ksp = 4 * Math.pow(s, 3); break;
        case "3": ksp = 27 * Math.pow(s, 4); break;
        case "4": ksp = 108 * Math.pow(s, 5); break;
    }

    document.getElementById('hc-ksp-val').innerText = ksp.toExponential(4);
    document.getElementById('hc-ksp-result').classList.add('visible');
}
