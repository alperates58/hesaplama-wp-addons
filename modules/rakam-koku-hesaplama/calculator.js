function hcDigitRootHesapla() {
    let num = document.getElementById('hc-dr-input').value;
    
    if (!num || isNaN(num)) {
        alert('Lütfen geçerli bir sayı giriniz.');
        return;
    }

    num = Math.abs(parseInt(num));
    
    // Digital root formula: 1 + (n - 1) % 9
    let root = num === 0 ? 0 : 1 + ((num - 1) % 9);

    document.getElementById('hc-dr-res-val').innerText = root;
    document.getElementById('hc-digit-root-result').classList.add('visible');
}
