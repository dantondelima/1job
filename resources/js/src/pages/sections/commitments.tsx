import { AspectRatio, Box, Flex, Heading, Img, VStack } from "@chakra-ui/react";
import React from "react";
import { Commitment } from "../../components/commitment";
import computer from "../../images/computer.png";

export const Commitments = () => {
    return (
        <Flex pl="200px" bg="brand.200" justifyContent="space-between">
            <Box py="80px" pr="50px">
                <Heading
                    color="whiteAlpha.900"
                    fontSize={32}
                    letterSpacing="3px"
                    pb="60px">
                    Acreditamos no seu sucesso
                </Heading>
                <VStack alignItems="flex-start" color="whiteAlpha.900" spacing="30px">
                    <Commitment text={"Lorem Ipsum"} />
                    <Commitment text={"Lorem Ipsum"} />
                    <Commitment text={"Lorem Ipsum"} />
                </VStack>
            </Box>
            <AspectRatio ratio={8 / 10} width="400px" height="400px" mr="100px">
                <Img src={computer} />
            </AspectRatio>
        </Flex >
    )
};