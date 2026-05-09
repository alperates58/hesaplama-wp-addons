function hcVennHesapla() {
    const a = parseInt(document.getElementById('hc-vn-a').value) || 0;
    const b = parseInt(document.getElementById('hc-vn-b').value) || 0;
    const i = parseInt(document.getElementById('hc-vn-i').value) || 0;

    if (i > a || i > b) {
        alert('Kesişim kümesi, kümelerin kendisinden büyük olamaz.');
        return;
    }

    const union = a + b - i;
    const aOnly = a - i;
    const bOnly = b - i;

    document.getElementById('hc-res-vn-u').innerText = union;
    document.getElementById('hc-res-vn-aonly').innerText = aOnly;
    document.getElementById('hc-res-vn-bonly').innerText = bOnly;
    
    document.getElementById('hc-venn-result').classList.add('visible');
}
