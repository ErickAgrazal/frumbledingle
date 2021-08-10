NODE_MODULES="./node_modules"

if [ -d $NODE_MODULES ] 
then 
    echo "Node modules already exists."
else
    echo "Install dependencies if they were not installed"
    npm install
fi

# Generate assets
npm run dev

# Execute infrastructure docker
docker-compose up --build --remove-orphans