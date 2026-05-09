function hcCUHesapla() {
    const posts = parseInt(document.getElementById('hc-cu-posts').value);
    const spacing = parseFloat(document.getElementById('hc-cu-spacing').value);

    if (isNaN(posts) || posts < 2 || isNaN(spacing) || spacing <= 0) {
        alert('Lütfen en az 2 direk ve geçerli bir aralık giriniz.');
        return;
    }

    // Length = (posts - 1) * spacing
    const len = (posts - 1) * spacing;

    document.getElementById('hc-cu-val').innerText = len.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' m';
    document.getElementById('hc-cu-result').classList.add('visible');
}
