function hcCMMHesapla() {
    const len = parseFloat(document.getElementById('hc-cmm-len').value);
    const spacing = parseFloat(document.getElementById('hc-cmm-spacing').value);
    const railsPerSection = parseInt(document.getElementById('hc-cmm-rails').value) || 0;

    if (isNaN(len) || len <= 0 || isNaN(spacing) || spacing <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const posts = Math.ceil(len / spacing) + 1;
    const totalRailLen = len * railsPerSection;

    document.getElementById('hc-cmm-posts').innerText = posts.toLocaleString('tr-TR') + ' Adet';
    document.getElementById('hc-cmm-raillen').innerText = totalRailLen.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' m';
    
    document.getElementById('hc-cmm-result').classList.add('visible');
}
