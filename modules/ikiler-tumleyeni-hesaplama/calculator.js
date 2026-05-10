function hcTwosCompHesapla() {
    let bin = document.getElementById('hc-ts-bin').value.trim();
    
    if (!/^[01]+$/.test(bin)) {
        alert('Lütfen sadece 0 ve 1 içeren geçerli bir ikili sayı giriniz.');
        return;
    }

    // 1's complement: flip bits
    let ones = bin.split('').map(bit => bit === '0' ? '1' : '0').join('');
    
    // 2's complement: add 1 to 1's complement
    let twos = (parseInt(ones, 2) + 1).toString(2);
    
    // Pad to match original length if necessary
    if (twos.length > bin.length) {
        twos = twos.slice(-bin.length);
    } else {
        twos = twos.padStart(bin.length, '0');
    }

    document.getElementById('hc-ts-ones').innerText = ones;
    document.getElementById('hc-ts-twos').innerText = twos;
    document.getElementById('hc-twos-result').classList.add('visible');
}
