function hcHataKoduHesapla() {
    const data = document.getElementById('hc-htk-data').value;
    const type = document.getElementById('hc-htk-type').value;

    if (!data) {
        alert('Lütfen veri girin.');
        return;
    }

    let bytes = [];
    let bitCount = 0;

    if (type === 'bin') {
        if (!/^[01]+$/.test(data)) {
            alert('Hata: Binary veri sadece 0 ve 1 içermelidir.');
            return;
        }
        // Count 1s for parity
        for (let char of data) {
            if (char === '1') bitCount++;
        }
        // Pack bits into bytes for checksum
        for (let i = 0; i < data.length; i += 8) {
            bytes.push(parseInt(data.substr(i, 8).padEnd(8, '0'), 2));
        }
    } else {
        for (let i = 0; i < data.length; i++) {
            const code = data.charCodeAt(i);
            bytes.push(code);
            // Count bits in ASCII
            let n = code;
            while (n > 0) {
                if (n & 1) bitCount++;
                n >>= 1;
            }
        }
    }

    // Parity (Even)
    const parity = (bitCount % 2 === 0) ? 0 : 1;

    // Checksum (8-bit)
    let sum = 0;
    bytes.forEach(b => sum = (sum + b) % 256);

    document.getElementById('hc-htk-res-parity').innerText = parity;
    document.getElementById('hc-htk-res-sum').innerText = '0x' + sum.toString(16).toUpperCase().padStart(2, '0');
    
    document.getElementById('hc-htk-result').classList.add('visible');
}
