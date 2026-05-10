function hcCakePortionHesapla() {
    const shape = document.getElementById('hc-portion-shape').value;
    const size = parseFloat(document.getElementById('hc-portion-size').value);
    const heightFactor = parseFloat(document.getElementById('hc-portion-height').value);

    if (isNaN(size) || size <= 0) {
        alert('Lütfen boyut giriniz.');
        return;
    }

    let area = 0;
    if (shape === 'round') {
        area = Math.PI * Math.pow(size / 2, 2);
    } else {
        area = size * size;
    }

    // Standart dilim yüzey alanı yaklaşık 25-30 cm2'dir.
    const portions = (area / 28) * heightFactor;

    document.getElementById('hc-portion-val').innerText = Math.round(portions) + ' Kişilik';
    document.getElementById('hc-portion-info').innerText = `Düğün porsiyonları (küçük) için bu sayı %25 artırılabilir. Ev porsiyonları için ideal değerdir.`;
    
    document.getElementById('hc-cake-portion-result').classList.add('visible');
}
