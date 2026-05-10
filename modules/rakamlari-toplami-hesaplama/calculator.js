function hcDigitSumHesapla() {
    let input = document.getElementById('hc-ds-input').value.trim();
    
    if (!input || isNaN(input.replace(/-/g, ''))) {
        alert('Lütfen geçerli bir sayı giriniz.');
        return;
    }

    let sum = 0;
    let digits = input.replace(/[^0-9]/g, '');
    
    for (let char of digits) {
        sum += parseInt(char);
    }

    document.getElementById('hc-ds-res-val').innerText = sum.toLocaleString('tr-TR');
    document.getElementById('hc-digit-sum-result').classList.add('visible');
}
