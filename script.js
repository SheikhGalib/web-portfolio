let menuIcon = document.querySelector("#menu-icon");
let navbar = document.querySelector(".navbar");

menuIcon.onclick = () => {
    menuIcon.classList.toggle("bx-x");
    navbar.classList.toggle("active");
}

// Download CV functionality
function downloadCV() {
    // Create a temporary link element
    const link = document.createElement('a');
    
    // Set the path to your CV file (you can update this path later)
    link.href = 'assets/Sheikh_Galib_Resume.pdf'; // Update this path to your actual CV file
    
    // Set the download attribute with the desired filename
    link.download = 'Sheikh_Galib_Resume.pdf';
    
    // Temporarily add the link to the document
    document.body.appendChild(link);
    
    // Trigger the download
    link.click();
    
    // Remove the temporary link
    document.body.removeChild(link);
}

// Social media links functionality
function openSocialLink(platform) {
    // Placeholder URLs - replace these with your actual social media links
    const socialLinks = {
        github: 'https://github.com/SheikhGalib', // Replace with your GitHub profile
        facebook: 'https://www.facebook.com/SheikhGalib01', // Replace with your Facebook profile
        instagram: 'https://x.com/Scipher_Tech', // Replace with your Instagram profile
        linkedin: 'https://www.linkedin.com/in/sheikhgalib' // Replace with your LinkedIn profile
    };
    
    // Open the link in a new tab
    if (socialLinks[platform]) {
        window.open(socialLinks[platform], '_blank');
    } else {
        console.log(`Please add your ${platform} profile URL`);
    }
}