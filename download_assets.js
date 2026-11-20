import fs from 'fs';
import https from 'https';
import path from 'path';

const images = {
    'hero-man.jpg': 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&auto=format&fit=crop&q=80',
    'salaried-man.jpg': 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=600&auto=format&fit=crop&q=80',
    'business-store.jpg': 'https://images.unsplash.com/photo-1441986300917-64674bd600d8?w=600&auto=format&fit=crop&q=80',
    'new-car.jpg': 'https://images.unsplash.com/photo-1617814076367-b759c7d7e738?w=600&auto=format&fit=crop&q=80',
    'used-car.jpg': 'https://images.unsplash.com/photo-1549399542-7e3f8b79c341?w=600&auto=format&fit=crop&q=80',
    'doctor.jpg': 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?w=600&auto=format&fit=crop&q=80',
    'ca-professional.jpg': 'https://images.unsplash.com/photo-1556157382-97eda2d62296?w=600&auto=format&fit=crop&q=80',
    'advisor-laptop.jpg': 'https://images.unsplash.com/photo-1560250097-0b93528c311a?w=800&auto=format&fit=crop&q=80',
    'support-agent.jpg': 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=800&auto=format&fit=crop&q=80'
};

function download(url, dest) {
    return new Promise((resolve, reject) => {
        const file = fs.createWriteStream(dest);
        https.get(url, (response) => {
            if (response.statusCode >= 300 && response.statusCode < 400 && response.headers.location) {
                return download(response.headers.location, dest).then(resolve).catch(reject);
            }
            response.pipe(file);
            file.on('finish', () => {
                file.close(resolve);
            });
        }).on('error', (err) => {
            fs.unlink(dest, () => {});
            reject(err);
        });
    });
}

async function run() {
    for (const [filename, url] of Object.entries(images)) {
        const dest = path.join('public', 'images', filename);
        try {
            console.log(`Downloading ${filename}...`);
            await download(url, dest);
            console.log(`Saved ${filename}`);
        } catch (e) {
            console.error(`Error downloading ${filename}:`, e.message);
        }
    }
}

run();
