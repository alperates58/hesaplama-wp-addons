function hcHealthyCoffeeHesapla() {
    const weight = parseFloat(document.getElementById('hc-coffee-weight').value);
    const caffPerCup = parseFloat(document.getElementById('hc-coffee-type').value);

    if (isNaN(weight) || weight <= 0) {
        alert('Lütfen kilonuzu giriniz.');
        return;
    }

    // Genel sağlık rehberleri mg/kg cinsinden de öneri verebilir ama yaygın sınır yetişkinler için 400mg'dır.
    // Bazı hassas kişilerde bu sınır kg başına 3-6mg olarak alınabilir.
    const maxCaffeine = 400; 
    const maxCups = maxCaffeine / caffPerCup;

    document.getElementById('hc-coffee-max').innerText = Math.floor(maxCups) + ' Adet';
    document.getElementById('hc-coffee-info').innerText = 'Not: Bu hesaplama yetişkinler içindir. Kafein hassasiyeti, gebelik veya sağlık sorunları durumunda sınır daha düşük olmalıdır.';
    document.getElementById('hc-healthy-coffee-result').classList.add('visible');
}
