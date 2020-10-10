import React from 'react';
import { makeStyles } from '@material-ui/core/styles';
import { Card, CardActionArea, CardContent, Container, Link, Typography } from '@material-ui/core';
import {Pagination, PaginationItem} from '@material-ui/lab';

const useStyles = makeStyles((theme) => ({
    root: {
        maxWidth: 900,
        margin: '10vh auto'
    },
    image: {
        width: 400,
        margin: "0 auto",
        marginBottom: theme.spacing(2),
        display: "block"
    },
    pagination: {
        marginTop: theme.spacing(2),
    }
}));

function App (props) {
    const classes = useStyles();
    const date = new Date(props.picture.publishingTime.date).toLocaleDateString();
    return (
        <Container className={classes.root}>
            <img className={classes.image} src={`/uploads/pictures/${props.picture.pictureFileName}`} alt={props.picture.description} />
            <Card>
                <CardActionArea>
                    <CardContent>
                        <Typography variant="h6" component="p">
                            publie le {date}
                        </Typography>
                        <Typography gutterBottom variant="h5" component="h2">
                            {props.picture.description}
                        </Typography>
                        <Link href={props.newPicture}>
                            Proposer votre photo
                        </Link>
                    </CardContent>
                </CardActionArea>
            </Card>
            <Pagination className={classes.pagination} count={parseInt(props.count)} page={parseInt(props.page)}
                renderItem={(item) => (
                    <PaginationItem
                        component={Link}
                        href={`${props.navigation}/${item.page}`}
                        {...item}
                    />
                )}
            />
        </Container>
    );
}

function Picture (props) {
    console.log(props);
    return <App {...props} />;
}

export default Picture;