function hcFboHesapla() {
    const base = parseFloat(document.getElementById('hc-fbo-type').value);
    const style = parseFloat(document.getElementById('hc-fbo-style').value);
    const road = parseFloat(document.getElementById('hc-fbo-road').value);

    const result = Math.round(base * style * road);

    document.getElementById('hc-fbo-val').innerText = result.toLocaleString('tr-TR') + " km";
    document.getElementById('hc-fbo-result').classList.add('visible');
}
