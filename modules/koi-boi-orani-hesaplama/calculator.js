function hcKOİBOİOranıHesapla() {
    const cod = parseFloat(document.getElementById('hc-cb-cod').value);
    const bod = parseFloat(document.getElementById('hc-cb-bod').value);

    if (!cod || !bod) return;

    const ratio = cod / bod;
    document.getElementById('hc-cb-val').innerText = ratio.toFixed(2);

    let interpretation = "";
    if (ratio < 2.5) {
        interpretation = "<strong>Kolayca Biyobozunur:</strong> Biyolojik arıtma için uygundur.";
    } else if (ratio < 4) {
        interpretation = "<strong>Kısmen Biyobozunur:</strong> Arıtma için ön işlem gerekebilir.";
    } else {
        interpretation = "<strong>Zor Biyobozunur:</strong> Kimyasal veya ileri arıtma yöntemleri gerekebilir.";
    }

    document.getElementById('hc-cb-interpretation').innerHTML = interpretation;
    document.getElementById('hc-cb-result').classList.add('visible');
}
