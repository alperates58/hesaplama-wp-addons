function hcSigFigsHesapla() {
    let s = document.getElementById('hc-sf-val').value.trim();

    if (!s) {
        alert('Lütfen bir sayı girin.');
        return;
    }

    // Clean scientific notation or other symbols if any (basic support)
    s = s.replace(',', '.');
    
    // Logic for counting significant figures
    // 1. Non-zero digits are always significant.
    // 2. Any zeros between two significant digits are significant.
    // 3. A final zero or trailing zeros in the decimal portion ONLY are significant.
    
    let count = 0;
    let sigDigits = '';
    
    // Simple implementation
    const original = s;
    let temp = s.replace('-', ''); // remove sign
    
    if (temp.includes('.')) {
        // Decimal rules
        // Remove leading zeros
        let leadingMatch = temp.match(/^0+(\.0+)?/);
        let startIdx = 0;
        if (leadingMatch) {
            // Find first non-zero
            let firstNonZero = temp.search(/[1-9]/);
            if (firstNonZero === -1) {
                // All zeros
                count = 0; // or 1 if it's 0.0? Usually 0 is tricky.
            } else {
                startIdx = firstNonZero;
            }
        }
        
        let sub = temp.substring(startIdx).replace('.', '');
        count = sub.length;
        sigDigits = sub;
    } else {
        // Integer rules
        // Trailing zeros are NOT significant unless there's a decimal point (which we handled)
        let leadingMatch = temp.match(/^0+/);
        let startIdx = leadingMatch ? leadingMatch[0].length : 0;
        let sub = temp.substring(startIdx);
        
        let trailingZerosMatch = sub.match(/0+$/);
        let effectiveSub = trailingZerosMatch ? sub.substring(0, sub.length - trailingZerosMatch[0].length) : sub;
        
        count = effectiveSub.length;
        sigDigits = effectiveSub;
    }

    document.getElementById('hc-res-sf-count').innerText = count;
    document.getElementById('hc-res-sf-digits').innerText = sigDigits || '0';

    document.getElementById('hc-sf-result').classList.add('visible');
}
