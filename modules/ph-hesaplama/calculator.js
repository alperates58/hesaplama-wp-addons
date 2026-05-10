function hcpHHesapla() {
    const hStr = document.getElementById('hc-ph-h').value;
    if (!hStr) return;

    const h = parseFloat(hStr);
    const ph = -Math.log10(h);

    document.getElementById('hc-ph-val').innerText = ph.toFixed(2);
    
    let desc = "";
    if (ph < 7) desc = "<span style='color:#c0392b;'>Asidik</span>";
    else if (ph > 7) desc = "<span style='color:#2980b9;'>Bazik</span>";
    else desc = "<span style='color:#27ae60;'>Nötr</span>";

    document.getElementById('hc-ph-desc').innerHTML = desc;
    document.getElementById('hc-ph-result').classList.add('visible');
}
