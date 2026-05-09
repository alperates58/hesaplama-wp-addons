function hcCurtainSizeHesapla() {
    const w = parseFloat(document.getElementById('hc-curt-w').value) || 0;
    const pile = parseFloat(document.getElementById('hc-curt-pile').value) || 1;

    if (w <= 0) return;

    const fabricWidth = (w * pile) + 10;

    document.getElementById('hc-res-curt-width').innerText = Math.round(fabricWidth) + ' cm';
    document.getElementById('hc-curtain-size-result').classList.add('visible');
}
