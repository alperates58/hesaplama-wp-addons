function hcVinylFenceHesapla() {
    const totalL = parseFloat(document.getElementById('hc-vf-length').value);
    const panelW = parseFloat(document.getElementById('hc-vf-panel').value);

    if (!totalL || !panelW) {
        alert('Lütfen uzunluk bilgilerini giriniz.');
        return;
    }

    const panels = Math.ceil(totalL / panelW);
    const posts = panels + 1; // Basic straight line assumption

    document.getElementById('hc-vf-res-panels').innerText = panels;
    document.getElementById('hc-vf-res-posts').innerText = posts;

    document.getElementById('hc-vinyl-fence-result').classList.add('visible');
}
